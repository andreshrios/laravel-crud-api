<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    activities: String
})
</script>

<template>
    <Head title="Actividades" />

    <div class="bg-gray-100 p-6 min-h-screen">
        <div class="bg-white shadow-xl p-8 rounded-lg">
            <div class="flex justify-between mb-12">
                <div>
                    <h1 class="font-bold text-xl">Actividades</h1>
                </div>
                <div>
                    <Link :href="route('activities.create')" class="bg-black hover:bg-gray-600 text-white font-bold px-4 py-3 rounded-xl uppercase font-bold">Crear</Link>
                </div>
            </div>
            <div class="flex py-4 text-center border-b border-gray-200">
                <div class="w-[5%] px-3"><h4 class="font-bold uppercase text-xs">ID</h4></div>
                <div class="w-[5%] px-3"><h4 class="font-bold uppercase text-xs">Consecutivo</h4></div>
                <div class="w-1/12 px-3"><h4 class="font-bold uppercase text-xs">Nombre</h4></div>
                <div class="w-1/12 px-3"><h4 class="font-bold uppercase text-xs">Monitor</h4></div>
                <div class="w-2/12 px-3"><h4 class="font-bold uppercase text-xs">Derecho Cultural</h4></div>
                <div class="w-2/12 px-3"><h4 class="font-bold uppercase text-xs">Nac</h4></div>
                <div class="w-1/12 px-3"><h4 class="font-bold uppercase text-xs">Fecha</h4></div>
                <div class="w-1/12 px-3"><h4 class="font-bold uppercase text-xs">Hora Inicio</h4></div>
                <div class="w-1/12 px-3"><h4 class="font-bold uppercase text-xs">Hora Final</h4></div>
                <div class="w-1/12 px-3"><h4 class="font-bold uppercase text-xs">Experticia</h4></div>
                <div class="w-1/12 px-3"><h4 class="font-bold uppercase text-xs">Fecha Carga</h4></div>
            </div>
            <div v-if="activities.length > 0">
                <div v-for="(activity, index) in activities" :key="index" class="flex py-4 text-center border-b border-gray-200">
                    <div class="w-[5%] px-3"><h4 class="text-md">{{ activity.id }}</h4></div>
                    <div class="w-[5%] px-3"><h4 class="text-md">{{ activity.consecutive }}</h4></div>
                    <div class="w-1/12 px-3"><h4 class="text-md">{{ activity.activity_name }}</h4></div>
                    <div class="w-1/12 px-3"><h4 class="text-md">{{ activity.monitor.name }}</h4></div>
                    <div class="w-2/12 px-3"><h4 class="text-md">{{ activity.cultural_right.name }}</h4></div>
                    <div class="w-2/12 px-3"><h4 class="text-md">{{ activity.nac.name }}</h4></div>
                    <div class="w-1/12 px-3"><h4 class="text-md">{{ activity.activity_date }}</h4></div>
                    <div class="w-1/12 px-3"><h4 class="text-md">{{ activity.format_start_time }}</h4></div>
                    <div class="w-1/12 px-3"><h4 class="text-md">{{ activity.format_final_hour }}</h4></div>
                    <div class="w-1/12 px-3"><h4 class="text-md">{{ activity.expertise.name }}</h4></div>
                    <div class="w-1/12 px-3"><h4 class="text-md">{{ activity.format_updated_at }}</h4></div>
                </div>
            </div>
            <div class="py-12" v-else>
                <p class="text-center">No se encontraron actividades</p>
            </div>
        </div>

    </div>
</template>
