<template lang="">
    <Head title="Projects Index" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between ">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects</h2>
                <Link :href="route('projects.create')" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">
                    New Project
                </Link>
            </div>
        </template>

        
        <div class="py-12">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 ">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    SN.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Project Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Skill
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    URL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr  v-for="project in projects.data" :key="project.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{project.id}}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{project.name}}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{project.skill.name}}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img :src="project.image" class="w-30 h-20 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" />
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{project.project_url}}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <Link 
                                        :href="route('projects.edit',project.id)"
                                        method="GET" as="button" type="button"
                                        class="font-medium p-3 ring-2 ring-blue-300 
                                        dark:ring-white-500 rounded-full text-blue-500 hover:text-blue-700 mr-2"
                                    >
                                    Edit
                                    </Link>

                                    <Link 
                                        :href="route('projects.destroy',project.id)"
                                        method="DELETE" as="button" type="button"
                                         class="font-medium p-3 ring-2 ring-red-300 dark:ring-white-500 
                                        rounded-full text-red-500 hover:text-red-700 mr-2"
                                    >
                                        Delete
                                    </Link>
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>

</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link } from '@inertiajs/vue3';
defineProps({
    projects:Object
})
</script>