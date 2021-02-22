<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Size attribute
        $size = Attribute::create([
            'name' => 'Size',
            'type' => Attribute::TYPE_STRING,
            'is_required' => true,
            'is_filterable' => true,
        ]);

        $sizeValues = collect(['xs', 's', 'm', 'l', 'xl', 'xxl', 'xxxl']);

        $sizeValues->each(function ($item) use ($size) {
            AttributeValue::create([
                'attribute_id' => $size->id,
                'value' => $item,
            ]);
        });

        // Color attribute
        $color = Attribute::create([
            'name' => 'Color',
            'type' => Attribute::TYPE_STRING,
            'is_required' => true,
            'is_filterable' => true,
        ]);

        $colorValues = collect(['black', 'white', 'red', 'yellow', 'green', 'blue', 'pink', 'orange', 'brown']);

        $colorValues->each(function ($item) use ($color) {
            AttributeValue::create([
                'attribute_id' => $color->id,
                'value' => $item,
            ]);
        });
    }
}
