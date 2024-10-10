new Vue({
    el: "#app",
    data() {
        return {
            formData: {
                email: '',
                subject: '',
                name: '',
                message: ''
            },
            base: 'https://gicer.id/api',
            errors: {},
            loading: false,
        }
    },
    computed: {
        emailError() {
            if (this.formData.email == '') {
                return 'Email wajib isi'
            }

            if (typeof this.errors.email != 'undefined' ) {
                return this.errors.email[0]
            }
        },
        subjectError() {
            if (this.formData.subject == '') {
                return 'Subyek wajib isi'
            }

            if (typeof this.errors.subject != 'undefined' ) {
                return this.errors.subject[0]
            }
        },
        nameError() {
            if (this.formData.name == '') {
                return 'Nama wajib isi'
            }

            if (typeof this.errors.name != 'undefined' ) {
                return this.errors.name[0]
            }
        },
        messageError() {
            if (this.formData.message == '') {
                return 'Pesan wajib isi'
            }

            if (typeof this.errors.message != 'undefined' ) {
                return this.errors.message[0]
            }
        }
    },
    methods: {
        submitContact() {
            this.loading = true
            axios.post(`${this.base}/contact`, this.formData)
                .then( (response) => {
                    this.loading = false
                    if ( response.status === 200 ) {
                        this.formData = {
                            email: '',
                            subject: '',
                            name: '',
                            message: ''
                        }

                        alert('Terima kasih, pesan sudah terkirim :-)')
                    }
                })
                .catch( (error) => {
                    this.loading = false
                    const status = error.response.status
                    if (status === 422) {
                        this.errors = error.response.data
                    }

                    if (status === 500) {
                        alert('Internal Server Error')
                    }
                })
        }
    }
})
