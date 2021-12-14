$(document).ready(function () {
  toastr.options.timeOut = 1500;
  toastr.options.positionClass = "toast-bottom-right";
  $("#linkButton").click(function () {
    toastr.success("Click Button");
  });
});
