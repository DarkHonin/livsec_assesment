<template>
    <div>
        <div>
            <button type='button' class='btn btn-secondary' v-if='!createNew.display' @click='createNew.display = true'>Create new</button>
            <div class='card' v-if='createNew.display'>
                <div class='card-body'>
                    <div class='my-3'>
                        <label class='input-lable'> Grocery name </label>
                        <input type='text' class='form-control' v-model='createNew.name' />
                    </div>
                    <div class='my-3'>
                        <label class='input-lable'> Grocery quantity </label>
                        <input type='text' class='form-control' v-model='createNew.quantity' />
                    </div>
                    <div class='my-3'>
                        <input type='submit' class='form-control' @click='create(createNew)' value='Create grocery' />
                    </div>
                </div>
            </div>
        </div>
        <div class='d-flex flex-wrap justify-content-start my-2'>
            <label class='card border-dark bg-dark m-1 w-25 text-light' v-for='(i, k) in items' v-bind:key='k'>
                <div class='card-body'>
                    <div class='card-title d-flex align-items-center'>
                        <span>{{i.name}}</span>
                    </div>
                    <span>Quantity: </span>
                    <span>{{i.quantity}}</span>
                </div>
                <div class='d-flex justify-content-between my-2 mx-1 bg-dark'>
                    <button :class='(i.checked ? "btn-success" : "btn-secondary") + " w-50 btn"' @click='i.checked = !i.checked; updateItem(k)'>Checked</button>
                    <button type="button" class="btn btn-danger" @click='deleteItem(k)'>Delete</button>
                </div>
            </label>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            createNew : {
                name: '', quantity : '', display: false
            },
            items : [],
            token : ''
        }
    },
    methods: {
        create({name, quantity}){
            fetch('/api/grocories', {
                method: 'POST',
                headers: {
                    'Authorization' : `Bearer ${this.token}`,
                    'Content-Type' : 'Application/json'
                },
                body: JSON.stringify({
                    name, quantity
                })
            }).then(resp => {
                resp.json().then(j => this.items.push(j))
                this.createNew = {
                    name: '', quantity : '', display: false
                }
            })
        },

        updateItem(index){
            fetch(`/api/grocories/${this.items[index].id}`, {
                method: 'PATCH',
                headers: {
                    'Authorization' : `Bearer ${this.token}`,
                    'Content-Type' : 'Application/json'
                },
                body: JSON.stringify({
                    checked: this.items[index].checked
                })
            })
        },

        deleteItem(index){
            var check = confirm(`Are you sure you want to delete ${this.items[index].name}?`)
            if(check){
                
                fetch(`/api/grocories/${this.items[index].id}`, {
                    method: 'DELETE',
                    headers: {
                        'Authorization' : `Bearer ${this.token}`,
                        },
                }).then(r => {
                    this.items.splice(index, 1)
                })
            }
        }
    },
    mounted() {
        this.token = document.querySelector('meta[name="token"').getAttribute('value')
        fetch('/api/grocories', {
                headers: {
                    'Authorization' : `Bearer ${this.token}`,
                    'Content-Type' : 'Application/json'
                },
            }).then(resp => {
                resp.json().then(j => {
                    this.items = j
                })
            })
    },
}
</script>

<style scoped>
</style>