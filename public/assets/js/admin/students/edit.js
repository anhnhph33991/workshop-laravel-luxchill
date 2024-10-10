const initSelect2 = () => {
  $("#select-subject-multiple").select2({
    placeholder: "Choose subject...",
    allowClear: true,
  });

  $("#select-classrom").select2();
};

$(document).ready(function () {
  initSelect2();
});
