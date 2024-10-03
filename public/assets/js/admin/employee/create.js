const previewImage = (event) => {
  $("#projectlogo-img").attr("src", URL.createObjectURL(event.target.files[0]));
  $("#projectlogo-img").addClass("h-screen");
};
