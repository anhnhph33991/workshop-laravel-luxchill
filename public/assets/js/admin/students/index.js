const handleDelete = (id) => {
  showAlertConfirm(() => {
    $(`#form-delete-student-${id}`).submit();
  });
};
