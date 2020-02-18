//delete user permit
function deleteUser(url) {
    if (confirm("Are you sure you want to delete this ?")) {
        window.location.href = url;
    }
}

//delete user reset
function resetUser(url) {
    if (confirm("Do you really want to reset the user validity period ?")) {
        window.location.href = url;
    }
}