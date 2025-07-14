import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

const SIDEBAR_KEY = 'sidebarCollapsed';

Alpine.store('sidebar', {
    collapsed: JSON.parse(localStorage.getItem(SIDEBAR_KEY) || 'false'),

    toggle() {
        this.collapsed = !this.collapsed;
        localStorage.setItem(SIDEBAR_KEY, JSON.stringify(this.collapsed));
    },

    close() {
        this.collapsed = true;
        localStorage.setItem(SIDEBAR_KEY, JSON.stringify(this.collapsed));
    },

    handleClick() {
        if (window.innerWidth < 1023) {
            setTimeout(() => this.close(), 300);
        }
    }
});

Alpine.store('modals', {
    openList: [],

    isOpen(name) {
        return this.openList.includes(name);
    },

    open(name) {
        if (!this.isOpen(name)) {
            this.openList.push(name);
        }
    },

    close(name) {
        this.openList = this.openList.filter(modal => modal !== name);
    }
});

Alpine.data('dropdown', () => ({
    open: false,

    toggle() {
        this.open = ! this.open;
    },

    close() {
        this.open = false;
    }
}));

Alpine.data('select', (options, placeholder = null, defaultValue = null) => ({
    open: false,
    selected: defaultValue ? defaultValue : placeholder ?  '' :  Object.keys(options)[0],
    options: options,
    defaultValue,
    placeholder,

    get displayText() {
        return this.selected
            ? this.options[this.selected]
            : this.placeholder ?? Object.values(this.options)[0];
    },
    get longestTextLength() {
        if (this.placeholder) return this.placeholder.length;
        return Math.max(...Object.values(this.options).map(t => (t || '').length));
    }
}));

Alpine.start();
