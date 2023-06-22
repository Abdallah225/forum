<template>
    <section class="py-5">
        <div class="container px-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Bienvenue "{{ userName }}" sur le forum</span></h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-11 col-xl-9 col-xxl-8">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-11 col-xl-9 col-xxl-8">
                            <form @submit.prevent="createDiscussion">
                                <!-- Message input-->
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="message" type="text" v-model="post.content"
                                        placeholder="Entrez le message ici..." style="height: 5rem"
                                        data-sb-validations="required"></textarea>
                                    <label for="message">Laissez un message</label>
                                    <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                                    </div>
                                </div>
                                <div class="d-none" id="submitErrorMessage">
                                    <div class="text-center text-danger mb-3">Error sending message!</div>
                                </div>
                                <!-- Submit Button-->
                                <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton"
                                        type="submit">Envoyer</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row gx-5 justify-content-center" v-for="discussion in discussions" :key="discussion.id">
                <div class="col-lg-11 col-xl-9 col-xxl-8">
                    <!-- Project Card 1-->
                    <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center">
                                <div class="p-5">
                                    <h5 class="fw-bolder">{{ discussion.user.name }} ({{ formatDate(discussion.created_at)
                                    }})
                                    </h5>
                                    <p>{{ discussion.content }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            post: {
                content: '',
            },
            discussions: [], // Déclarer et initialiser la propriété "discussions" avec un tableau vide
            userId: null,
            userName: null,
        };
    },
    mounted() {
        this.fetchDiscussions();
        this.checkUserLoggedIn();
    },

    methods: {
        // recuperation des discussions 
        fetchDiscussions() {
            axios.get('/api/commentaire')
                .then(response => {
                    this.discussions = response.data; // Mettre à jour le tableau discussions avec les données reçues depuis l'API
                })
                .catch(error => {
                    console.error(error);
                });
        },
        // verification de l'utilisateur connecté
        checkUserLoggedIn() {
            axios.get('/api/user')
                .then(response => {
                    this.userId = response.data.id;
                    const authToken = response.data.api_token;
                    const userName = response.data.name; // Récupérer le nom de l'utilisateur depuis la réponse de l'API
                    localStorage.setItem('authToken', authToken);
                    this.userName = userName;
                })
                .catch(error => {
                    console.error(error);
                });
        },

        // envoi de message de desicussion
        createDiscussion() {
            const data = {
                content: this.post.content,
                userId: this.userId,
            };
            axios.post('/api/commentaire', data)
                .then(response => {
                    // Effectuer les actions nécessaires après la création réussie de la discussion

                    // Réinitialiser le champ de saisie
                    this.post.content = '';

                    // Récupérer à nouveau les discussions pour mettre à jour la liste
                    this.fetchDiscussions();
                })
                .catch(error => {
                    console.error(error);
                });
        },
        formatDate(date) {
            const options = {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };

            return new Date(date).toLocaleDateString('fr-FR', options);
        }
    }
};
</script>