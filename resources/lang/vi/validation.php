<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Bạn phải đồng ý mục :Attribute.',
    'accepted_if' => 'Bạn phải đồng ý mục :Attribute nếu :other là :value.',
    'active_url' => ':Attribute phải là liên kết hợp lệ.',
    'after' => ':Attribute phải là ngày sau :date.',
    'after_or_equal' => ':Attribute phải là ngày sau hoặc bằng :date.',
    'alpha' => ':Attribute chỉ được dùng các chữ cái.',
    'alpha_dash' => ':Attribute chỉ được dùng chữ cái, chữ số, dấu gạch ngang và gạch dưới.',
    'alpha_num' => ':Attribute chỉ được dùng chữ cái và chữ số.',
    'array' => ':Attribute phải là một danh sách.',
    'before' => ':Attribute phải là ngày trước :date.',
    'before_or_equal' => ':Attribute phải là ngày sớm hơn hoặc bằng :date.',
    'between' => [
        'numeric' => ':Attribute phải nằm trong khoảng từ :min đến :max.',
        'file' => ':Attribute phải nằm trong khoảng từ :min đến :max KB.',
        'string' => ':Attribute phải nằm trong khoảng từ :min đến :max ký tự.',
        'array' => ':Attribute phải có từ :min đến :max mục.',
    ],
    'boolean' => ':Attribute chỉ chấp nhận giá trị đúng hoặc sai.',
    'confirmed' => ':Attribute xác nhận không khớp.',
    'current_password' => 'Mật khẩu sai.',
    'date' => ':Attribute phải là định dạng ngày tháng hợp lệ.',
    'date_equals' => ':Attribute phải là ngày tương đương với :date.',
    'date_format' => ':Attribute phải đúng định dạng :format.',
    'declined' => ':Attribute phải được từ chối.',
    'declined_if' => ':Attribute phải được từ chối nếu :other là :value.',
    'different' => ':Attribute và :other phải khác nhau.',
    'digits' => ':Attribute phải bao gồm :digits chữ số.',
    'digits_between' => ':Attribute phải từ :min đến :max chữ số.',
    'dimensions' => 'Kích thước ảnh :Attribute không hợp lệ.',
    'distinct' => ':Attribute không được trùng giá trị.',
    'email' => ':Attribute phải là địa chỉ email hợp lệ.',
    'ends_with' => ':Attribute phải kết thúc bằng một trong các giá trị: :values.',
    'enum' => ':Attribute đã chọn không hợp lệ.',
    'exists' => ':Attribute không tồn tại.',
    'file' => ':Attribute phải là File.',
    'filled' => ':Attribute phải được điền giá trị.',
    'gt' => [
        'numeric' => ':Attribute phải lớn hơn :value.',
        'file' => ':Attribute phải lớn hơn :value KB.',
        'string' => ':Attribute phải lớn hơn :value ký tự.',
        'array' => ':Attribute phải nhiều hơn :value mục.',
    ],
    'gte' => [
        'numeric' => ':Attribute phải lớn hơn hoặc bằng :value.',
        'file' => ':Attribute phải lớn hơn hoặc bằng :value KB.',
        'string' => ':Attribute phải lớn hơn hoặc bằng :value characters.',
        'array' => ':Attribute phải có từ :value mục trở lên.',
    ],
    'image' => ':Attribute phải là hình ảnh.',
    'in' => ':Attribute đã chọn không hợp lệ.',
    'in_array' => ':Attribute phải nằm trong :other.',
    'integer' => ':Attribute phải là số nguyên.',
    'ip' => ':Attribute phải là địa chỉ IP hợp lệ.',
    'ipv4' => ':Attribute phải là địa chỉ IPv4 hợp lệ.',
    'ipv6' => ':Attribute phải là địa chỉ IPv6 hợp lệ.',
    'json' => ':Attribute phải là định dạng JSON.',
    'lt' => [
        'numeric' => ':Attribute phải nhỏ hơn :value.',
        'file' => ':Attribute phải nhỏ hơn :value KB.',
        'string' => ':Attribute phải nhỏ hơn :value ký tự.',
        'array' => ':Attribute phải ít hơn :value mục.',
    ],
    'lte' => [
        'numeric' => ':Attribute phải nhỏ hơn hoặc bằng :value.',
        'file' => ':Attribute phải nhỏ hơn hoặc bằng :value KB.',
        'string' => ':Attribute phải nhỏ hơn hoặc bằng :value ký tự.',
        'array' => ':Attribute không được có nhiều hơn :value mục.',
    ],
    'mac_address' => ':Attribute phải là địa chỉ MAC.',
    'max' => [
        'numeric' => ':Attribute không được lớn hơn :max.',
        'file' => ':Attribute không được lớn hơn :max KB.',
        'string' => ':Attribute không được lớn hơn :max ký tự.',
        'array' => ':Attribute không được quá :max mục.',
    ],
    'mimes' => ':Attribute phải có định dạng mime: :values.',
    'mimetypes' => ':Attribute phải có định dạng mime: :values.',
    'min' => [
        'numeric' => ':Attribute không được nhỏ hơn :min.',
        'file' => ':Attribute không được nhỏ hơn :min KB.',
        'string' => ':Attribute không được nhỏ hơn :min ký tự.',
        'array' => ':Attribute phải có ít nhất :min mục.',
    ],
    'multiple_of' => ':Attribute phải là bội số của :value.',
    'not_in' => ':Attribute đã chọn không hợp lệ.',
    'not_regex' => 'định dạng :Attribute không hợp lệ.',
    'numeric' => ':Attribute phải là số.',
    'password' => 'Mật khẩu sai.',
    'present' => 'Form không có mục :Attribute.',
    'prohibited' => ':Attribute field is prohibited.',
    'prohibited_if' => ':Attribute field is prohibited when :other is :value.',
    'prohibited_unless' => ':Attribute field is prohibited unless :other is in :values.',
    'prohibits' => ':Attribute field prohibits :other from being present.',
    'regex' => 'Định  dạng :Attribute không hợp lệ.',
    'required' => ':Attribute không được để trống.',
    'required_array_keys' => ':Attribute field must contain entries for: :values.',
    'required_if' => ':Attribute là bắt buộc nếu :other là :value.',
    'required_unless' => ':Attribute là bắt buộc trừ khi :other là :values.',
    'required_with' => ':Attribute là bắt buộc khi :values tồn tại.',
    'required_with_all' => ':Attribute là bắt buộc khi :values tồn tại.',
    'required_without' => ':Attribute là bắt buộc khi :values không tồn tại.',
    'required_without_all' => ':Attribute là bắt buộc khi không có mục nào trong :values tồn tại.',
    'same' => ':Attribute và :other phải bằng nhau.',
    'size' => [
        'numeric' => ':Attribute phải bằng :size.',
        'file' => ':Attribute phải bằng :size KB.',
        'string' => ':Attribute phải có :size ký tự.',
        'array' => ':Attribute phải có :size mục.',
    ],
    'starts_with' => ':Attribute phải bắt đầu với: :values.',
    'string' => ':Attribute phải là chuỗi ký tự.',
    'timezone' => ':Attribute must be a valid timezone.',
    'unique' => ':Attribute bị trùng lặp.',
    'uploaded' => 'Upload :Attribute thất bại.',
    'url' => ':Attribute phải là liên kết hợp lệ.',
    'uuid' => ':Attribute phải là UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
