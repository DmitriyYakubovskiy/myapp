import 'bootstrap';

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import ModalNavigation from './modal-navigation';

document.addEventListener('DOMContentLoaded', () => {
    const modalNav = new ModalNavigation();
    modalNav.init(); // важно!
});
