jQuery(document).ready(function($) {
    // Инициализация protected-кнопок
    function initProtectedButtons() {
        $('.protected-button').each(function() {
            const $button = $(this);
            
            // Пропускаем кнопки, которые уже имеют свои обработчики
            if ($button.attr('id') === 'zvonokSubmit' || $button.attr('id') === 'obrashenieSubmit' || 
                $button.attr('id') === 'imRegistrButton' || $button.hasClass('podtverditZak') || $button.hasClass('otmenitZak')) {
                return;
            }
            
            $button.on('click', function(e) {
                // Проверяем, защищена ли кнопка
                if (typeof window.formProtection !== 'undefined' && window.formProtection.isProtected($button)) {
                    e.preventDefault();
                    return false;
                }
                
                // Защищаем кнопку
                if (typeof window.formProtection !== 'undefined') {
                    window.formProtection.protectButton($button);
                }
            });
        });
    }
    
    // Инициализация после загрузки DOM
    initProtectedButtons();
    
    // Динамическая инициализация для элементов, добавленных позже
    if (typeof MutationObserver !== 'undefined') {
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.addedNodes.length) {
                    initProtectedButtons();
                }
            });
        });
        
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    }
});