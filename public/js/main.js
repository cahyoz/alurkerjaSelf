import '{{ asset(css/index.css) }}';
import "toastify-js/src/toastify.css"
import Toastify from 'toastify-js'

const inputForms = document.querySelectorAll('.input-form')

document
    .querySelector('.btn-contact')
    .addEventListener('click', () => {
        document.querySelector('.loader-btn-contact').classList.remove('hidden')
        const payloads = {};

        inputForms.forEach(inputForm => {
            payloads[inputForm.name] = inputForm.value;
        })

        fetch(`${import.meta.env.VITE_API_S2}/leads`, {
            method: 'POST',
            body: JSON.stringify(payloads),
            headers: {
                'Content-Type': 'application/json'
            },
        }).then(res => res.json())
            .then(res => {
                if (res.status === 'success') {
                    Toastify({
                        text: "Berhasil mengirim pesan ke tim alurkerja",
                        duration: 3000,
                        stopOnFocus: true,
                        gravity: "top",
                        position: "center",
                    }).showToast()
                } else {
                    Toastify({
                        text: "Gagal mengirim pesan ke tim alurkerja",
                        duration: 3000,
                        stopOnFocus: true,
                        gravity: "top",
                        position: "center",
                        style: {
                            background: "linear-gradient(to right, #ED213A, #93291E)"
                        }
                    }).showToast()
                }
            }).catch(err => {
                Toastify({
                    text: "Gagal mengirim pesan ke tim alurkerja",
                    duration: 3000,
                    stopOnFocus: true,
                    gravity: "top",
                    position: "center",
                    style: {
                        background: "linear-gradient(to right, #ED213A, #93291E)"
                    }
                }).showToast()
            }).finally(() => {
                document.querySelector('.loader-btn-contact').classList.add('hidden')
                inputForms.forEach(inputForm => {
                    if (inputForm.type !== 'hidden') {
                        inputForm.value = ''
                    }
                })
            })
    })
