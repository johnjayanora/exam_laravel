<template>
    <tr>
        <td>{{ school.school }}</td>
        <td>{{ school.total }}</td>
    </tr>
</template>

<script>
export default {
    name:"PasserCountRow",
    props:["school"]
}
</script>

