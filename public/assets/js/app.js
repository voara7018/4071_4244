document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.alert-custom[data-autodismiss]').forEach(function (alert) {
        setTimeout(function () {
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';
            setTimeout(function () { alert.remove(); }, 300);
        }, 5000);
    });

    // Animate elements on scroll
    const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -30px 0px' };
    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fadeIn');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.animate-on-scroll').forEach(function (el) {
        observer.observe(el);
    });

    // Loading button state
    document.querySelectorAll('form').forEach(function (form) {
        form.addEventListener('submit', function () {
            var btn = form.querySelector('button[type="submit"]');
            if (btn && !btn.classList.contains('btn-loading')) {
                var originalText = btn.innerHTML;
                btn.classList.add('btn-loading');
                btn.innerHTML = '<span class="spinner"></span> Chargement...';
                setTimeout(function () {
                    btn.classList.remove('btn-loading');
                    btn.innerHTML = originalText;
                }, 8000);
            }
        });
    });

    // Toast notification helper
    window.showToast = function (message, type) {
        type = type || 'info';
        var container = document.querySelector('.toast-container');
        if (!container) {
            container = document.createElement('div');
            container.className = 'toast-container';
            document.body.appendChild(container);
        }
        var icons = {
            success: 'bi-check-circle-fill',
            danger: 'bi-exclamation-circle-fill',
            warning: 'bi-exclamation-triangle-fill',
            info: 'bi-info-circle-fill'
        };
        var toast = document.createElement('div');
        toast.className = 'toast-custom';
        toast.style.borderLeftColor = 'var(--' + type + ')';
        toast.innerHTML = '<i class="bi ' + (icons[type] || icons.info) + '" style="color:var(--' + type + ');font-size:1.2rem"></i>' +
                          '<span style="flex:1">' + message + '</span>' +
                          '<button onclick="this.parentElement.classList.add(\'closing\');setTimeout(()=>this.parentElement.remove(),300)" style="border:none;background:none;cursor:pointer;color:var(--text-muted)"><i class="bi bi-x"></i></button>';
        container.appendChild(toast);
        setTimeout(function () {
            toast.classList.add('closing');
            setTimeout(function () { toast.remove(); }, 300);
        }, 4000);
    };
});
