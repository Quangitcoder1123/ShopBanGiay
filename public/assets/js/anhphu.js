var pusher = new Pusher('eec3ab6632d20e677d76', {
    encrypted: true,
    cluster: "ap1"
});
var notificationsToggle = $('#dropdown-notifications').find('a[id="notiDropdown"]');
var notificationsCountElem = notificationsToggle.find('#data-count');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var channel = pusher.subscribe('NotificationEvent');
channel.bind('send-message', function(data) {
    var newNotificationHtml = `
    <a class="dropdown-item bg-warning" href="/admin/borrows"><strong>${data.title}</strong>
    <br/>
    <span class="text-muted text">${data.content}</span>
    </a>
    `;

    $('#notiContent').prepend(newNotificationHtml);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    console.log(notificationsCount);
});