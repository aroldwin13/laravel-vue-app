<script setup>
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import TextInput from '@/Components/Input.vue';
import InputLabel from '@/Components/Label.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from "@/Components/Button.vue";
import { Head, useForm, } from "@inertiajs/vue3";


const props = defineProps({
    blog: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    id: props.blog.id,
    title: props.blog.title,
    content: props.blog.content,
});

const editBlog = () => {
    // Update form data with the current blog details
    form.title = props.blog.title;
    form.content = props.blog.content;
};

const submit = async () => {
    try {
        await form.put(route("blogs.update", props.blog.id), {
            onSuccess: () => {
                // Optionally, you can redirect or perform any actions upon successful submission
                // For example, redirect to a new page:
                // this.$inertia.visit(route('blogs.index'));
            },
        });
    } catch (error) {
        console.error('Error submitting form:', error);
        // Handle errors that may occur during submission
    }
};
</script>

<template>
    <Head title="Blog Edit" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Blog Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="title" value="Title" />

                                <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required
                                    autofocus autocomplete="username" />

                                <InputError class="mt-2" :message="form.errors.title" />
                            </div>
                            <div class="my-6">
                                <label for="slug"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Content</label>
                                <textarea type="text" v-model="form.content" name="content" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>

                                <div v-if="form.errors.content" class="text-sm text-red-600">
                                    {{ form.errors.content }}
                                </div>
                            </div>
                            <PrimaryButton type="submit" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Submit
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>