$(document).ready(function () {
  $(".deleteBtn").click(function (e) {
    e.preventDefault();
    href = e.target.href;
    Swal.fire({
      title: "Are you sure?",
      text: "You will still be able to restore this action. :)",
      icon: "warning",
      iconColor: "#ffef94",
      background: "#343a40",
      showCancelButton: true,
      confirmButtonColor: "#ffef94",
      customClass: {
        confirmButton: "text-dark",
        title: "text-white",
        htmlContainer: "text-white",
      },
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.replace(href);
      }
    });
  });

  $(".deleteBtnBook").click(function (e) {
    e.preventDefault();
    href = e.target.href;
    Swal.fire({
      title: "Are you sure?",
      text: "Deleting this book will delete all user reviews and notes for this book!",
      icon: "warning",
      iconColor: "#ffef94",
      background: "#343a40",
      showCancelButton: true,
      confirmButtonColor: "#ffef94",
      customClass: {
        confirmButton: "text-dark",
        title: "text-white",
        htmlContainer: "text-white",
      },
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.replace(href);
      }
    });
  });

  $(".deleteBtnPerm").click(function (e) {
    e.preventDefault();
    href = e.target.href;
    Swal.fire({
      title: "Are you sure?",
      text: "This action is irreversable!",
      icon: "warning",
      iconColor: "#ffef94",
      background: "#343a40",
      showCancelButton: true,
      confirmButtonColor: "#ffef94",
      customClass: {
        confirmButton: "text-dark",
        title: "text-white",
        htmlContainer: "text-white",
      },
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.replace(href);
      }
    });
  });

  // Category and Author filter
  var $filterCheckboxes = $('input[type="checkbox"]');
  var filterFunc = function () {
    var selectedFilters = {};

    $filterCheckboxes.filter(":checked").each(function () {
      if (!selectedFilters.hasOwnProperty(this.name)) {
        selectedFilters[this.name] = [];
      }

      selectedFilters[this.name].push(this.value);
    });

    var $filteredResults = $(".categoryDiv");

    $.each(selectedFilters, function (name, filterValues) {
      $filteredResults = $filteredResults.filter(function () {
        var matched = false,
          currentFilterValues = $(this).data("category").split(" ");

        $.each(currentFilterValues, function (_, currentFilterValue) {
          if ($.inArray(currentFilterValue, filterValues) != -1) {
            matched = true;
            return false;
          }
        });

        return matched;
      });
    });

    $(".categoryDiv").hide().filter($filteredResults).show();
  };

  $(document).on("change", "input[type='checkbox']", filterFunc);

  // Quote API
  fetch("http://api.quotable.io/random")
    .then((data) => {
      return data.json();
    })
    .then((quote) => {
      let data = `<h2>"${quote.content}"</h2>
  <p class="fst-italic m-0">-${quote.author}</p>`;
      $(".quoteDiv").html(data);
    })
    .catch((err) => {
      console.log(err);
    });

  // AJAX notes
  $("#noteSubmit").submit(function (e) {
    let form = $("#noteSubmit");
    e.preventDefault();
    if ($("#note").val().length == 0) {
      $("#note").after(
        "<div class='alert alert-danger text-center mt-2 mb-0' id='noteValidation'>Your note is empty!</div>"
      );
      setTimeout(function () {
        $("#noteValidation").remove();
      }, 2000);
    } else {
      $.ajax({
        type: form.attr("method"),
        url: form.attr("action"),
        data: form.serialize(),
        success: function () {
          $("#note").after(
            "<div class='alert alert-success text-center mt-2 mb-0' id='noteValidation'>Added your note successfully!</div>"
          );
          setTimeout(function () {
            $("#noteValidation").remove();
          }, 2000);
          $("#note").val("");
          $.ajax({
            url: `${appUrl}actions/notes/show.php?id=${id}`,
            method: "GET",
            success: function (response) {
              $("#noteContainer").html(response);
            },
          });
        },
      });
    }
  });

  const appUrl = "http://localhost/bs/src/";
  const url = new URL(window.location.href);
  const id = url.searchParams.get("id");

  $.ajax({
    url: `${appUrl}actions/notes/show.php?id=${id}`,
    method: "GET",
    success: function (response) {
      $("#noteContainer").html(response);
    },
  });

  $(document).on("click", ".deleteNote", function () {
    $.ajax({
      url: `${appUrl}actions/notes/delete.php`,
      method: "POST",
      data: { id: $(this).data("id") },
      success: function () {
        $("#note").after(
          "<div class='alert alert-success text-center mt-2 mb-0' id='noteValidation'>Deleted your note successfully!</div>"
        );
        setTimeout(function () {
          $("#noteValidation").remove();
        }, 2000);
        $.ajax({
          url: `${appUrl}actions/notes/show.php?id=${id}`,
          method: "GET",
          success: function (response) {
            $("#noteContainer").html(response);
          },
        });
      },
    });
  });

  $(document).on("click", ".editNote", function (e) {
    $.ajax({
      url: `${appUrl}actions/notes/getNote.php?id=${$(this).attr("data-id")}`,
      method: "GET",
      success: function (response) {
        $(".modal-body").html(response);
      },
    });
  });

  $(document).on("click", "#editNoteSubmit", function (e) {
    $.ajax({
      url: `${appUrl}actions/notes/update.php`,
      method: "POST",
      data: {
        id: $("input[name=id]").val(),
        note: $("textarea[name=note]").val(),
      },
      success: function () {
        $("#note").after(
          "<div class='alert alert-success text-center mt-2 mb-0' id='noteValidation'>Updated your note successfully!</div>"
        );
        setTimeout(function () {
          $("#noteValidation").remove();
        }, 2000);
        $.ajax({
          url: `${appUrl}actions/notes/show.php?id=${id}`,
          method: "GET",
          success: function (response) {
            $("#noteContainer").html(response);
          },
        });
      },
    });
  });
});
