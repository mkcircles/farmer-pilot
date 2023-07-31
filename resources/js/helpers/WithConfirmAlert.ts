import Swal from "sweetalert2"


const WithConfirmAlert = (action: () => Promise<any>) => {

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-warning bg-secondary px-4 py-2 text-white my-2 rounded',
          cancelButton: 'btn btn-secondary mx-4 px-4 py-2 bg-slate-100 text-slate-500 my-2  rounded',
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Continue!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
            action()
            .then(({title, message}) => {
                if(!title) return;
                swalWithBootstrapButtons.fire(
                    title,
                    message,
                    'success',
                  )
            })
            .catch(({title, message}) => {
                if(!title) return;
                swalWithBootstrapButtons.fire(
                    title,
                    message,
                    'error'
                  )
            })
          
        }
      })
    
}

export default WithConfirmAlert;