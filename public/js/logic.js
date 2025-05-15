document.getElementById('ajaxForm').addEventListener('submit',function(event){
    event.preventDefault();
    const data=new FormData(this);
    axios.post('/testform',data,{
        Headers:
        {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf"]').getAttribute('content'),
         'Accept':'application/json'
        }
    })
    .then(function (response){
        alert(response.data.message);
        document.getElementById('ajaxForm').reset();
    })
    .catch(function (error){
        if (error.response && error.response.status===422){
            const errors=error.response.data.errors;
            let errorStr='';
            for (let field in errors){
                if (errors.hasOwnProperty(field)){
                    const errorMsgs=errors[field];
                    errorStr+=field+':'+errorMsgs.join('\n')+'\n';
                    alert(errorStr);
                }
            }
        }
    });
});