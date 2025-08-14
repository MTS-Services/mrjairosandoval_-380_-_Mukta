document.addEventListener('alpine:init', () => {
    Alpine.store('theme', {
        current:  'dark',  // Default to 'dark'

        init() {
            this.updateTheme();
        },

        updateTheme() {
            localStorage.setItem('theme', this.current);

            const isDark = this.current === 'dark';
            document.documentElement.classList.toggle('dark', isDark);
            document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'dark');

            if (window.lucide) lucide.createIcons();  // Optional, to refresh icons
        },

        toggleTheme() {
            this.current = this.current === 'light' ? 'dark' : 'dark';
            this.updateTheme();
        },

        get darkMode() {
            return this.current === 'dark';
        }
    });
});
