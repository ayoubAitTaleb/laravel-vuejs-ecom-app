<template>
    <div class="col-md-6 form-group">        
        <button class="btn btn-danger btn-sm" @click="confirmDelete">delete</button>
    </div>
</template>
<script>
    export default {
        methods:{
            confirmDelete(e){
                e.preventDefault(); // prevent form submit
                var form = e.target.form; 
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                    });
                }
        }

    }
</script>
