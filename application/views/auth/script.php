 <script>
     //Show Password
     function showPassword() {
         let x = document.getElementById("passwordInput");

         if (x.type === "password") {
             x.type = "text";
         } else {
             x.type = "password";
         }
     }

     function errorLogin() {
         Swal.fire({
             toast: true,
             position: 'top-right',
             iconColor: 'white',
             customClass: {
                 popup: 'colored-toast'
             },
             showConfirmButton: false,
             timer: 3000,
             timerProgressBar: true,
             icon: 'error',
             title: 'Akun Tidak Terdeteksi',
         })
     }
 </script>


 </html>