const handleDelete = (id) => {
  showAlertConfirmTrash(() => {
    $(`#form-delete-employee-${id}`).submit();
  });
};
