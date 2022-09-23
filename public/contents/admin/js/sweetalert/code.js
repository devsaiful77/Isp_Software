// confirm
$(document).on("click", "#confirm", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To Confirm?",
        text: "Once Confirm, you will not go Back Step Again!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Not Confirm!");
        }

    });
});

// cancel
$(document).on("click", "#cancel", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To Cancel?",
        text:  "Once Cancel, you will not go Back Step Again!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Not Cancel!");
        }

    });
});

// processing
$(document).on("click", "#processing", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To Processing?",
        text:  "Once Confirm, you will not go Back Step Again!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Not Confirm!");
        }

    });
});

// picked
$(document).on("click", "#picked", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To Picked?",
        text:  "Once Confirm, you will not go Back Step Again!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Not Confirm!");
        }

    });
});

// shipped
$(document).on("click", "#shipped", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To Shipped?",
        text:  "Once Confirm, you will not go Back Step Again!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Not Confirm!");
        }

    });
});

// delevery
$(document).on("click", "#delevery", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To Delevery?",
        text:  "Once Confirm, you will not go Back Step Again!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Not Confirm!");
        }

    });
});

// delete
$(document).on("click", "#delete", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To Delete?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Your imaginary file is safe!");
        }

    });
});

// Approve
$(document).on("click", "#approve", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To Approve?",
        text: "Once Approve, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Your imaginary file is safe!");
        }

    });
});









