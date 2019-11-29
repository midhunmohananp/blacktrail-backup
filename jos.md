You can pass a prop to the `publish-blog` component.

This would be what ever page or component you are using the publish blog on, though to be honest I'm not sure why you would not just put the `VueTrix` component inside of the `publish-blog` component.

This would be on what ever page/component you are wanting it on.
```
<template>
    <PublishBlog :trix="trix">
        <VueTrix v-model="trix" />
    </PublishBlog>
</template>

<script>
import PublishBlog from './PublishBlog.vue';

export default {
    components: {
        PublishBlog,
    },
    data() {
        return {
            trix: '',
        };
    },
};
</script>
```

and inside of the publish blog component make the `form.editorContent` the prop passed or a default value.

But without a global store/state you are stuck with props.

UPDATE: Showing what a publish blog component might look like


PublishBlog.vue
```
<template>
    <section>
        what ever goes here.
        <slot />
    </section>
</template>

<script>
export default {
    name: 'PublishBlog',
    props: {
        trix: {
            type: String,
            default: '',
        },
    },
    data() {
        return {
            form: {
                editorContent: this.trix
            },
        };
    },
};
</script>
```