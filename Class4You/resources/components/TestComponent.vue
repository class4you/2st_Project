<template>
	{{ date }}
	<VDatePicker v-model="date" mode="date" />
</template>

<script>
import { reactive, ref } from 'vue';
import { Calendar, DatePicker } from 'v-calendar';
import 'v-calendar/style.css';


export default {
components: {
	Calendar,
	DatePicker,
},
data() {
	return {
		date: new Date(),
	};
},
}
</script>

<style>
    .vc-title {
		background-color: transparent;
	}
</style>