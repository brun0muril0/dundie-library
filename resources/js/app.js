import './bootstrap';
import '../css/app.css';

import { createApp } from 'vue';

/* Importação de componentes padrão*/
import headerComp from './components/headerComp.vue';
import footerComp from './components/footerComp.vue';

/* Importação de componentes da tela de home*/
import homePage from './components/homePage.vue';

/* Importação de componentes da tela de livros*/
import registerBooksPage from './components/books/registerBooksPage.vue';

/* Importação de componentes da tela de atores*/
import registerAuthorsPage from './components/authors/registerAuthorsPage.vue';

const app = createApp({
    components: {
        headerComp,
        footerComp,
        homePage,
        registerBooksPage,
        registerAuthorsPage,

    }
});

app.mount("#app");
