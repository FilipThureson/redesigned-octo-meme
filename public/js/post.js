$.ajax({
    type: 'post',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: '/api' + window.location.pathname,
    success: function(data) {
        console.log(data);
        document.getElementById('post-pfp').src = '/img/' + data.post[0].profile_pic;
        document.getElementById('caption-pfp').src = '/img/' + data.post[0].profile_pic;
        document.getElementById('name').innerHTML = data.post[0].firstname + " " + data.post[0].surname;
        document.getElementById('post-img').src = '/img/' + data.post[0].img;
        document.getElementById('name-caption').innerText =  data.post[0].firstname + " " + data.post[0].surname + " ";
        document.getElementById('caption').innerText =  ' ' + data.post[0].caption;
        document.getElementById('profile-link').href =  '/profile/' + data.post[0].id;



        data.comments.forEach(comment => {
            document.getElementById('output').innerHTML += `
                <div class="comment">
                    <div>
                        <div>
                            <img class="pfp" src="/img/${comment.profile_pic}">
                            <strong>${comment.firstname} ${comment.surname}:</strong>
                        </div>
                        <p>
                            ${comment.comment}
                        </p>
                    </div>
                    <h6>${comment.posted_at}</h6>
                </div>
            `;
        });
    }
});
