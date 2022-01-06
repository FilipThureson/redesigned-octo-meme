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
                <img src="/img/${post.img}" alt="">
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
