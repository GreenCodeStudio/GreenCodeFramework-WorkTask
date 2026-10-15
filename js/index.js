import {pageManager} from "../../Core/js/pageManager";
pageManager.registerController('WorkTaskProject', () => import('./Controllers/WorkTaskProject'));
pageManager.registerController('WorkTask', () => import('./Controllers/WorkTask'));