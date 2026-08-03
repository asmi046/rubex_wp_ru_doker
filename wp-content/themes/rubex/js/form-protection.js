(function($) {
    'use strict';
    
    class FormProtection {
        constructor(options = {}) {
            this.defaults = {
                timeout: 30000,
                loadingClass: 'btn-loading',
                successClass: 'btn-success',
                errorClass: 'btn-error',
                showLoading: true,
                blockOnError: true,
                disableOnSuccess: true
            };
            
            this.options = $.extend({}, this.defaults, options);
            this.protectedButtons = new Set();
        }
        
        init() {
            this.bindEvents();
        }
        
        bindEvents() {
            $('.protected-form').on('submit', $.proxy(this.handleFormSubmit, this));
            $('.protected-button').on('click', $.proxy(this.handleButtonClick, this));
        }
        
        handleFormSubmit(e) {
            const form = $(e.currentTarget);
            const submitButton = form.find('[type="submit"], .submit-button');
            
            if (this.isProtected(submitButton)) {
                e.preventDefault();
                return false;
            }
            
            this.protectButton(submitButton);
        }
        
        handleButtonClick(e) {
            const button = $(e.currentTarget);
            
            if (this.isProtected(button)) {
                e.preventDefault();
                return false;
            }
            
            this.protectButton(button);
        }
        
        protectButton(button) {
            if (!button.length || this.isProtected(button)) return;
            
            const originalText = button.html();
            const originalDisabled = button.prop('disabled');
            
            this.protectedButtons.add(button[0]);
            
            button.data('original-text', originalText);
            button.data('original-disabled', originalDisabled);
            
            button.prop('disabled', true);
            
            if (this.options.showLoading) {
                button.addClass(this.options.loadingClass);
                if (!button.find('.loading-spinner').length) {
                    const loadingText = button.data('loading-text') || 'Загрузка...';
                    button.html(`<span class="loading-spinner"></span> ${loadingText}`);
                }
            }
            
            setTimeout(() => {
                if (this.isProtected(button)) {
                    this.unprotectButton(button, true);
                }
            }, this.options.timeout);
            
            return button;
        }
        
        unprotectButton(button, isTimeout = false) {
            if (!button.length || !this.isProtected(button)) return;
            
            this.protectedButtons.delete(button[0]);
            
            const originalText = button.data('original-text') || '';
            const originalDisabled = button.data('original-disabled') || false;
            
            button.html(originalText);
            button.prop('disabled', originalDisabled);
            
            button.removeClass(this.options.loadingClass);
            
            if (isTimeout) {
                button.addClass(this.options.errorClass);
                setTimeout(() => button.removeClass(this.options.errorClass), 3000);
            }
            
            return button;
        }
        
        markSuccess(button) {
            if (!button.length) return;
            
            this.protectedButtons.delete(button[0]);
            
            if (this.options.disableOnSuccess) {
                button.prop('disabled', true);
            }
            
            button.removeClass(this.options.loadingClass);
            button.addClass(this.options.successClass);
            
            if (button.data('success-text')) {
                button.html(button.data('success-text'));
            }
        }
        
        markError(button) {
            if (!button.length) return;
            
            this.protectedButtons.delete(button[0]);
            
            if (this.options.blockOnError) {
                this.unprotectButton(button);
            } else {
                button.prop('disabled', false);
                button.removeClass(this.options.loadingClass);
                button.addClass(this.options.errorClass);
                
                const originalText = button.data('original-text') || '';
                if (originalText) {
                    button.html(originalText);
                }
                
                setTimeout(() => button.removeClass(this.options.errorClass), 3000);
            }
        }
        
        isProtected(button) {
            return this.protectedButtons.has(button[0]);
        }
        
        createProtectedAjax(settings) {
            const button = settings.button;
            const successCallback = settings.success;
            const errorCallback = settings.error;
            
            this.protectButton(button);
            
            const protectedSettings = {
                ...settings,
                success: (response) => {
                    this.markSuccess(button);
                    if (successCallback) successCallback(response);
                },
                error: (xhr, status, error) => {
                    this.markError(button);
                    if (errorCallback) errorCallback(xhr, status, error);
                }
            };
            
            return $.ajax(protectedSettings);
        }
    }
    
    window.formProtection = new FormProtection();
    
    $(document).ready(function() {
        window.formProtection.init();
    });
    
})(jQuery);