<template>
    <div class="form-group row">
        <label v-bind:for="id" class="col-md-2 col-form-label text-md-right">{{label}}</label>
        <div class="col-md-6 .set-content">
            <select v-bind:id="id" ref="input" multiple>
                <slot></slot>
            </select>
            <slot name="error"></slot>
        </div>
    </div>
</template>

<script>
    import SlimSelect from 'slim-select'
    export default {
        props:['id','label','error','values'],
        mounted() {
            new SlimSelect({
                select: '#' + this.id,
            })
        },
    }
</script>