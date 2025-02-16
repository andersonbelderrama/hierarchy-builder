<template>
    <div>
        <h2 class="text-xl font-semibold text-gray-900 mb-4">
            Posicionar Seções e Campos
        </h2>
        <draggable
            v-model="sections"
            group="sections"
            @end="onSectionDragEnd"
            item-key="id"
            class="space-y-4"
        >
            <template #item="{ element: section }">
                <div class="p-4 bg-gray-50 rounded-md border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                        {{ section.name }}
                    </h3>
                    <draggable
                        v-model="section.fields"
                        group="fields"
                        @end="onFieldDragEnd(section)"
                        item-key="id"
                        class="flex flex-row flex-wrap gap-4"
                    >
                        <template #item="{ element: field }">
                            <div
                                class="p-4 bg-gray-100 rounded-md cursor-move border border-gray-300"
                                :style="{ order: field.order }"
                            >
                                {{ field.label }} (Order: {{ field.order }})
                            </div>
                        </template>
                    </draggable>
                </div>
            </template>
        </draggable>
    </div>
</template>

<script setup>
import { ref } from "vue";
import draggable from "vuedraggable";

// Dados estáticos de exemplo
const sections = ref([
    {
        id: 1,
        name: "Informações Pessoais",
        order: 1,
        fields: [
            { id: 1, label: "Nome Completo", order: 1 },
            { id: 2, label: "Data de Nascimento", order: 2 },
            { id: 3, label: "CPF", order: 3 },
        ],
    },
    {
        id: 2,
        name: "Endereço",
        order: 2,
        fields: [
            { id: 4, label: "Rua", order: 1 },
            { id: 5, label: "Número", order: 2 },
            { id: 6, label: "CEP", order: 3 },
        ],
    },
    {
        id: 3,
        name: "Contato",
        order: 3,
        fields: [
            { id: 7, label: "Telefone", order: 1 },
            { id: 8, label: "E-mail", order: 2 },
        ],
    },
]);

// Atualiza a ordem das seções
const onSectionDragEnd = () => {
    sections.value = sections.value.map((section, index) => ({
        ...section,
        order: index + 1,
    }));

    console.log("Seções reposicionadas:", sections.value);
};

// Atualiza a ordem dos campos dentro de uma seção
const onFieldDragEnd = (section) => {
    section.fields = section.fields.map((field, index) => ({
        ...field,
        order: index + 1,
    }));

    console.log(
        "Campos reposicionados na seção:",
        section.name,
        section.fields
    );
};
</script>

<style>
/* Estilos básicos para o flexbox */
.flex {
    display: flex;
}

.flex-row {
    flex-direction: row;
}

.flex-wrap {
    flex-wrap: wrap;
}

.gap-4 {
    gap: 1rem;
}

.bg-gray-50 {
    background-color: #f9fafb;
}

.bg-gray-100 {
    background-color: #f3f4f6;
}

.rounded-md {
    border-radius: 0.375rem;
}

.cursor-move {
    cursor: move;
}

.border {
    border-width: 1px;
}

.border-gray-200 {
    border-color: #e5e7eb;
}

.border-gray-300 {
    border-color: #d1d5db;
}
</style>
