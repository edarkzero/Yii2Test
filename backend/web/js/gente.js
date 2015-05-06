function setForm(event)
{
    var id = $(event.relatedTarget).attr('data-id');
    console.log(id);
}

function resetForm(form)
{
    $(form).trigger("reset");
    console.log('reseted');
}