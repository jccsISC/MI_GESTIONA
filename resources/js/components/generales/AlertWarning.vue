
<template>
    <div class="modal fade el-julio-se-la-come-riendo"  :class="uniqueClass" role="dialog" aria-labelledby="modalEmpty" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header alert m-0" :class="{ 'alert-danger': this.type == 'danger', 'alert-success': this.type == 'success' }">
                    <h5 class="modal-title m-0 txt-center"> {{message}} </h5>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['message', 'type', 'show', 'nameAlert'],
        computed: {
            uniqueClass() {
                if (!this.nameAlert) {
                    return {};
                }

                return {
                    [this.nameAlert]: true,
                }
            },
        },
        mounted() {
            if (this.show) {
                const className = '.' + (this.nameAlert || 'el-julio-se-la-come-riendo')
                $(className).modal('show');
            }
        },
        watch: {
            show: function (value) {
                console.log('showing', value)
                const className = '.' + (this.nameAlert || 'el-julio-se-la-come-riendo')
                $(className).modal(value ? 'show' : 'hide');
            }
        }
    }
</script>
