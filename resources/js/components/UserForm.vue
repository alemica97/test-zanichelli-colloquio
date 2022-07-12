<template>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="form-wrapper">
            <div class="form-header px-4">
                Dati anagrafici
            </div>
            <ValidationObserver v-slot="{handleSubmit}">
                <form @submit.prevent="handleSubmit(submit)" class="p-4">
                    
                    <validationProvider class="mb-3" name="nome" rules="required|min:3|max:150|alpha_spaces" v-slot="{ errors }">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" :class="[errors.length ? 'invalid' : 'valid', 'form-control']" required id="nome" name="nome" v-model="form.nome" placeholder="Inserisci il tuo nome">
                            <span class="error">{{ errors[0] }}</span>
                        </div>
                    </validationProvider>

                    <validationProvider class="mb-3" name="cognome" rules="required|min:3|max:150|alpha_spaces" v-slot="{ errors }">
                        <div class="form-group">
                            <label for="cognome">Cognome</label>
                            <input type="text" :class="[errors.length ? 'invalid' : 'valid', 'form-control']" required id="cognome" name="cognome" v-model="form.cognome" placeholder="Inserisci il tuo cognome">
                            <span class="error">{{ errors[0] }}</span>
                        </div>
                    </validationProvider>

                    <validationProvider class="mb-3" name="email" rules="required|email|max:255" v-slot="{ errors }">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" :class="[errors.length ? 'invalid' : 'valid', 'form-control']" required id="email" name="email" v-model="form.email" aria-describedby="emailHelp" placeholder="Inserisci la tua email">
                            <span class="error">{{ errors[0] }}</span>
                        </div>
                    </validationProvider>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                </form>
            </ValidationObserver>
        </div>
    </div>
</template>

<script>

    export default {
       data() {
        return {
            // Form
            form: {
                nome: "",
                cognome: "",
                email: "",
            },
            success: false,
        }
    },
    methods: {

        submit(){
            axios.post('/api/users', {
                form: this.form
            })
            .then( response => {
                if (response.status == 200) {
                        this.success = true;
                        alert('Utente registrato con successo')
                    }
            })
            .catch( error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors
                    console.log(this.errors)
                    this.success = false;
                }
                console.log('Error');
            })
            this.success = false;
        }
    }
    }
</script>

<style lang="scss" scoped>
    .form-wrapper{
        width: 450px;
        max-width: 90%;
        background-color: rgba(238, 238, 238, 0.891);
        border-radius: 10px;
        box-shadow: 0px 0px 12px 0px #6666665e;
    }

    .form-header{
        height: 60px;
        line-height: 60px;
        background-color: rgba(221, 221, 221, 0.804);
        font-size: 30px;
        font-weight: 500;
        border-radius: 10px 10px 0 0;
        color: #444;
    }

    .error{
        color: red;
    }

    .invalid{
        border-color: red;
        color: red;
    }

    .container{
        height: calc(100vh - 80px);
    }
</style>
