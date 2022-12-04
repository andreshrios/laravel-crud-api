<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3'

import VueTimePicker from "vue3-timepicker"

const props = defineProps({
    monitors: Object,
    cultural_rights: Object,
    expertises: Object,
    nacs: Object,
    consecutive: String
})

const form = useForm({
    consecutive: 'FP' + props.consecutive,
    activity_name: null,
    monitor_id: null,
    start_time: null,
    cultural_right_id: null,
    expertise_id: null,
    activity_date: null,
    final_hour: null,
    nac_id: null
})

const submit = () => {
    form.post(route('activities.store'))
};

</script>

<template>
    <Head title="Crear Actividad" />

    <div class="bg-gray-100 p-6 min-h-screen">
        <div class="bg-white max-w-5xl mx-auto shadow-xl p-8 rounded-lg">
            <div class="flex justify-between">
                <div>
                    <h1 class="font-bold text-2xl">Formulario</h1>
                </div>
                <div class="text-right">
                    <h6>Consecutivo</h6>
                    <h1 class="font-bold text-2xl">{{ form.consecutive }}</h1>
                </div>
            </div>
            <div class="py-12">
                <form @submit.prevent="submit">
                    <div class="flex space-x-8">
                        <div class="w-1/2 space-y-4">
                            <div>
                                <label for="" class="font-bold mb-2 block">Nombre Actividad *</label>
                                <input v-model="form.activity_name" type="text" placeholder="Nombre Actividad *" class="w-full border border-gray-200 rounded-xl px-4 py-2">
                                <span v-if="form.errors.activity_name" class="block mt-2 text-xs font-bold text-red-600 italic">{{ form.errors.activity_name }}</span>
                            </div>
                            <div>
                                <label for="" class="font-bold mb-2 block">Hora Inicio *</label>
                                <VueTimePicker format="hh:mm a" v-model="form.start_time"></VueTimePicker>
                                <span v-if="form.errors.start_time" class="block mt-2 text-xs font-bold text-red-600 italic">{{ form.errors.start_time }}</span>
                            </div>
                            <div>
                                <label for="" class="font-bold mb-2 block">Derecho Cultural *</label>
                                <select v-model="form.cultural_right_id" class="w-full border border-gray-200 rounded-xl px-4 py-2">
                                    <option :value="cultural_right.id" v-for="(cultural_right, index) in cultural_rights" :key="index">{{ cultural_right.name }}</option>
                                </select>
                                <span v-if="form.errors.cultural_right_id" class="block mt-2 text-xs font-bold text-red-600 italic">{{ form.errors.cultural_right_id }}</span>
                            </div>
                            <div>
                                <label for="" class="font-bold mb-2 block">Monitor *</label>
                                <select v-model="form.monitor_id" class="w-full border border-gray-200 rounded-xl px-4 py-2">
                                    <option :value="monitor.id" v-for="(monitor, index) in monitors" :key="index">{{ monitor.name }}</option>
                                </select>
                                <span v-if="form.errors.monitor_id" class="block mt-2 text-xs font-bold text-red-600 italic">{{ form.errors.monitor_id }}</span>
                            </div>
                        </div>
                        <div class="w-1/2 space-y-4">
                            <div>
                                <label for="" class="font-bold mb-2 block">Experticia *</label>
                                <select v-model="form.expertise_id" class="w-full border border-gray-200 rounded-xl px-4 py-2">
                                    <option :value="expertise.id" v-for="(expertise, index) in expertises" :key="index">{{ expertise.name }}</option>
                                </select>
                                <span v-if="form.errors.expertise_id" class="block mt-2 text-xs font-bold text-red-600 italic">{{ form.errors.expertise_id }}</span>
                            </div>
                            <div>
                                <label for="" class="font-bold mb-2 block">Fecha *</label>
                                <input v-model="form.activity_date" type="date" class="w-full border border-gray-200 rounded-xl px-4 py-2">
                                <span v-if="form.errors.activity_date" class="block mt-2 text-xs font-bold text-red-600 italic">{{ form.errors.activity_date }}</span>
                            </div>
                            <div>
                                <label for="" class="font-bold mb-2 block">Hora Final *</label>
                                <VueTimePicker format="hh:mm a" v-model="form.final_hour"></VueTimePicker>
                                <span v-if="form.errors.final_hour" class="block mt-2 text-xs font-bold text-red-600 italic">{{ form.errors.final_hour }}</span>
                            </div>
                            <div>
                                <label for="" class="font-bold mb-2 block">Nac *</label>
                                <select v-model="form.nac_id" class="w-full border border-gray-200 rounded-xl px-4 py-2">
                                    <option :value="nac.id" v-for="(nac, index) in nacs" :key="index">{{ nac.name }}</option>
                                </select>
                                <span v-if="form.errors.nac_id" class="block mt-2 text-xs font-bold text-red-600 italic">{{ form.errors.nac_id }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="bg-black hover:bg-gray-600 text-white font-bold px-4 py-3 rounded-xl uppercase font-bold">Crear</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>
