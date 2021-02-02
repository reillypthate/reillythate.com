var item;
//  1: Add a button set to each item.

$('.item-add-button').click(openAddModal);
$('.item-edit-button').click(openEditModal);

class ModalForm
{
    type;
    fields;

    /**
     * 
     * @param {string} type 
     * @param {array} fields 
     */
    constructor(type, fields)
    {
        this.type = type;
        this.fields = fields;
    }




    get type()
    {
        return this.type;
    }
    get fields()
    {
        return this.fields;
    }
}