var DatatableDataLocalDemo = {
    init: function() {
        var e, a, i;
        e = JSON.parse(''), i = a.getDataSourceQuery(), $("#m_form_status").on("change", function() { a.search($(this).val(), "Status") }).val(void 0 !== i.Status ? i.Status : ""), $("#m_form_type").on("change", function() { a.search($(this).val(), "Type") }).val(void 0 !== i.Type ? i.Type : ""), $("#m_form_status, #m_form_type").selectpicker()
    }
};
jQuery(document).ready(function() { DatatableDataLocalDemo.init() });