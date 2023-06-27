<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link,useForm,router } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
const props = defineProps({
    skill:Object,
})
const form = useForm({
    name: props.skill?.name,
    image:null
});

// const submit = () => {
//     form.post(route('skills.store'));
// };

const submit = () =>{
    router.post(`/skills/${props.skill.id}`,{
        _method:"put",
        name:form.name,
        image:form.image
    });
}
</script>
<template lang="">
    <Head title="Update Skill" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between ">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Update Skills</h2>
                <Link :href="route('skills.index')" class="px-4 py-2 bg-purple-500 hover:bg-purple-700 text-white rounded-md">
                    Skills
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white ">
                
                <form class="p-4" @submit.prevent="submit">
                    <div>
                        <InputLabel for="name" value="Skill Name" />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                        />

                        <InputError class="mt-2" :message="$page.props.errors.name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="image" value="Upload Skill Image" />

                        <TextInput
                            id="image"
                            type="file"
                            class="mt-1 block w-full"
                            @input="form.image = $event.target.files[0]"
                        />

                        <InputError class="mt-2" :message="$page.props.errors.image" />
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
