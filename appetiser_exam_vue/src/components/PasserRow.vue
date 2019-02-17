<template>
    <tr>
        <td>{{ passer.id }}</td>
        <td>{{passer.name}}</td>
        <td>{{passer.campus_eligibility}}</td>
        <td>{{passer.school}}</td>
        <td>{{passer.division}}</td>
    </tr>
</template>

<script>
export default {
    name:"PasserRow",
    props:['passer']
}
</script>

