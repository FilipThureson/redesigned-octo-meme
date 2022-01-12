$.ajax({
    type: 'post',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: '/api' + window.location.pathname,
    success: function(data) {
        console.log(data);
        document.getElementById('name').innerText = data.user[0].firstname + " " + data.user[0].surname
        document.getElementById('amountOfPosts').innerText = data.amountOfPosts
        document.getElementById('amountOfFollowers').innerText = data.amountOfFollowers
        document.getElementById('amountOfFollowing').innerText = data.amountOfFollowing
        document.getElementById('pfp').src= '/img/' + data.user[0].profile_pic;

        if(data.isFollowing){
            document.getElementById('followBtn').innerText = "Unfollow";
        }

        data.posts.forEach(post => {
            document.getElementById('post-row').innerHTML += `
            <div class="post">
                <a href="/post/${post.p_id}">
                <img src="/img/${post.img}" alt="">
                </a>
            </div>
            `
        });
    }
});

const followBtn =  document.getElementById('followBtn');

if(followBtn){
    followBtn.addEventListener('click',()=>{
        $.ajax({
            url : '/api' + window.location.pathname + '/follow',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                document.getElementById('amountOfFollowers').innerText = data.amountOfFollowers
                if(data.isFollowing){
                    followBtn.innerText = "Unfollow";
                }else{
                    followBtn.innerText = "Follow";
                }
            }
        })
    })
}

$('.followinfo').on('click', function(){
    let id = this.id
    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/api' + window.location.pathname + '/' +this.id,
        success: function(data) {
            console.log(data);
            let box = document.getElementById('followInfo');
            if(box.style.display != 'inline'){
                box.style.display = 'inline';
            }
            box.innerHTML = `<h1>${id}</h1>`;
            data.forEach(user=>{
                box.innerHTML += `
                    <div class="follow-user-wrapper">
                        <a class="follow-info-link" href="/profile/${user.id}">
                            <span class="follow-info-span">
                                <img src="/img/${user.profile_pic}">
                                <p>${user.firstname} ${user.surname}</p>
                            </span>
                        </a>
                    </div>
                `;
            });
        }
    });
})

$('main').on('click', function(){
    document.getElementById('followInfo').style.display = "none";
});
