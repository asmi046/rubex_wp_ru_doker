(function($) {
    'use strict';
    
    // Простая защита без конфликтов
    var SimpleFormProtection = {
        protectedButtons: new Set(),
        timeout: 30000,
        
        protectButton: function(button) {
            if (!button.length || this.protectedButtons.has(button[0])) return;
            
            this.protectedButtons.add(button[0]);
            const originalText = button.html();
            
            button.data('original-text', originalText);
            button.data('original-disabled', button.prop('disabled'));
            button.prop('disabled', true);
            
            // Добавляем индикатор загрузки
            if (!button.find('.simple-spinner').length) {
                button.html('<span class="simple-spinner"></span> Отправка...');
                button.addClass('simple-loading');
            }
            
            // Автоматическая разблокировка через таймаут
            setTimeout($.proxy(function() {
                this.unprotectButton(button, true);
            }, this), this.timeout);
        },
        
        unprotectButton: function(button, isTimeout) {
            if (!button.length || !this.protectedButtons.has(button[0])) return;
            
            this.protectedButtons.delete(button[0]);
            
            const originalText = button.data('original-text') || '';
            const originalDisabled = button.data('original-disabled') || false;
            
            button.html(originalText);
            button.prop('disabled', originalDisabled);
            button.removeClass('simple-loading');
            
            if (isTimeout) {
                console.warn('Button timeout:', button.attr('id'));
            }
        },
        
        markSuccess: function(button) {
            if (!button.length) return;
            
            this.protectedButtons.delete(button[0]);
            button.removeClass('simple-loading');
            button.prop('disabled', true); // Оставляем заблокированной
        },
        
        markError: function(button) {
            if (!button.length) return;
            
            this.protectedButtons.delete(button[0]);
            button.removeClass('simple-loading');
            button.html(button.data('original-text'));
            button.prop('disabled', false);
        },
        
        isProtected: function(button) {
            return this.protectedButtons.has(button[0]);
        },
        
        // Совместимость с методами по умолчанию
        protect: function(button) {
            return this.protectButton(button);
        },
        
        unprotect: function(button, isTimeout) {
            return this.unprotectButton(button, isTimeout);
        }
    };
    
    // Делаем доступным глобально
    window.simpleFormProtection = SimpleFormProtection;
    
    // Логирование для диагностики
    console.log('SimpleFormProtection initialized');
    console.log('Available methods:', Object.keys(SimpleFormProtection));
    
})(jQuery);
