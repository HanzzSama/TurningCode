// update last_seen
setInterval(() => {
    fetch('/ping-online')
}, 60000);

// update status admin
setInterval(() => {
    fetch('/admin-status')
        .then(res => res.json())
        .then(data => {
            data.forEach(admin => {
                const el = document.getElementById('admin-' + admin.id);
                if (!el) return;

                if (admin.is_online) {
                    el.innerText = '● Online';
                    el.className = 'online';
                } else {
                    el.innerText = '● Offline';
                    el.className = 'offline';
                }
            });
        });
}, 5000);
