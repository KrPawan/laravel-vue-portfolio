<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link,useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    skill_id:'',
    project_url :'',
    image:null
});
const submit = () => {
    form.post(route('projects.store'));
};

defineProps({
    skills: Array
});
</script>
<template lang="">
    <Head title="Create Project" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between ">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Project</h2>
                <Link :href="route('projects.index')" class="px-4 py-2 bg-purple-500 hover:bg-purple-700 text-white rounded-md">
                    Projects
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white ">
                
                <form class="p-4" @submit.prevent="submit">
                    <div>
                        <InputLabel for="skill_id" value="Select Skill" />

                        <select v-model="form.skill_id" id="skill_id" name="skill_id"
                            class="w-full block "
                        >
                            <option v-for="skill in skills" :key="skill.id" :value="skill.id">{{skill.name}}</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.skill_id" />

                    </div>
                    <div class="mt-4">
                        <InputLabel for="name" value="Project Name" />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="image" value="Upload Project Image" />

                        <TextInput
                            id="image"
                            type="file"
                            required
                            class="mt-1 block w-full"
                            @input="form.image = $event.target.files[0]"
                        />

                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="project_url" value="Project project_url" />

                        <TextInput
                            id="project_url"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.project_url"
                        />

                        <InputError class="mt-2" :message="form.errors.project_url" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        
                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Submit
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>

</template>
