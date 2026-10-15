import {FormManager} from "../../../Core/js/form";
import {Ajax} from "../../../Core/js/ajax";
import {pageManager} from "../../../Core/js/pageManager";
import {DatasourceAjax} from "../../../Core/js/datasourceAjax";
import {t} from "../../i18n.xml";
import {t as TCommonBase} from "../../../CommonBase/i18n.xml";
import {ObjectsList} from "../../../Core/js/ObjectsList/objectsList";
import {Permissions} from "../../../Core/js/permissions";
import {create} from "fast-creator";

export class index {
    constructor(page, data) {
        const container = page.querySelector('.page-WorkTask-list .container');
        let datasource = new DatasourceAjax('WorkTask', 'getTable', ['WorkTask', 'WorkTask'], null, 'updateMultiple');
        let objectsList = new ObjectsList(datasource);
        objectsList.allowTableEdit = true;
        objectsList.columns = [];
        objectsList.columns.push({
            name: t('WorkTask.title'),
            dataName: 'title',
            sortName: 'title',
            width: 100,
            widthGrow: 1
        });
        objectsList.columns.push({
            name: t('WorkTask.workTaskColumn'),
            dataName: 'workTaskColumnTitle',
            sortName: 'workTaskColumnTitle',
            width: 100,
            widthGrow: 1
        });
        objectsList.generateActions = (rows, mode) => {
            let ret = [];
            if (rows.length == 1) {
                if (Permissions.can('WorkTask', 'show')) {
                    ret.push({
                        name: TCommonBase("show"),
                        icon: 'icon-show',
                        href: "/WorkTask/show/" + rows[0].id,
                        action: "show"
                    });
                }

                if (Permissions.can('WorkTask', 'edit')) {
                    ret.push({
                        name: TCommonBase("edit"),
                        icon: 'icon-edit',
                        href: "/WorkTask/edit/" + rows[0].id,
                        action: "edit"
                    });
                }
            }
            return ret;
        }
        container.append(objectsList);
        objectsList.icon='icon-worktask';
        objectsList.refresh();
    }
}

export class edit {
    constructor(page, data) {
        let form = new FormManager(page.querySelector('form'));
        console.log('data.selects', data.selects)
        form.load(data.WorkTask);
        loadColumnsSelect(page, data.selects.work_task_column);

        form.submit = async newData => {
            await Ajax.WorkTask.update(newData);
            pageManager.goto('/WorkTask');
        }
    }
}
function loadColumnsSelect(page, selectsData) {
    page.querySelector('select[data-foreign-key="work_task_column"]').append(
        ...selectsData.map(
            project => create(
                'optgroup',
                {label: project.project_name},
                ...project.columns.map(
                    item => create(
                        'option',
                        {
                            value: item.id, text: item.title
                        }
                    )
                )
            )
        )
    );
}

export class add {
    constructor(page, data) {
        let form = new FormManager(page.querySelector('form'));
            loadColumnsSelect(page, data.selects.work_task_column);

        form.submit = async newData => {
            await Ajax.WorkTask.insert(newData);
            pageManager.goto('/WorkTask');
        }
    }
}
