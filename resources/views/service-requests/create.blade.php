
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Service Request</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #F8EEEE;
            color: #351C1C;
        }

        header {
            background: #801818;
            color: white;
            padding: 20px 8%;
            box-shadow: 0 3px 10px rgba(100, 18, 18, 0.15);
        }

        header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            max-width: 700px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .form-card {
            background: #FFFFFF;
            padding: 30px;
            border-radius: 14px;
            border: 1px solid #E5C7C7;
            box-shadow: 0 5px 18px rgba(100, 18, 18, 0.08);
        }

        .form-card h1 {
            color: #801818;
            font-size: 28px;
            margin-top: 0;
            margin-bottom: 12px;
        }

        .subtitle {
            color: #765858;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: bold;
            margin: 20px 0 8px;
            color: #641212;
            font-size: 14px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #D9B1B1;
            border-radius: 8px;
            font-size: 15px;
            font-family: inherit;
            background: #FFFFFF;
            color: #351C1C;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #801818;
            box-shadow: 0 0 0 3px rgba(128, 24, 24, 0.12);
        }

        textarea {
            min-height: 140px;
            resize: vertical;
            line-height: 1.6;
        }

        .file-help {
            color: #765858;
            font-size: 13px;
            line-height: 1.6;
            margin-top: 7px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            margin-top: 24px;
            transition: background 0.2s, transform 0.2s;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .submit-btn {
            background: #801818;
            color: #FFFFFF;
        }

        .submit-btn:hover {
            background: #641212;
        }

        .back-btn {
            background: #F0DCDC;
            color: #641212;
            margin-left: 8px;
        }

        .back-btn:hover {
            background: #E5C7C7;
        }

        .notice {
            background: #F8EEEE;
            color: #641212;
            border-left: 4px solid #801818;
            padding: 14px;
            border-radius: 7px;
            line-height: 1.7;
            font-size: 14px;
            margin-bottom: 22px;
        }

        .error {
            color: #A11D1D;
            font-size: 14px;
            margin-top: 7px;
        }

        .error-summary {
            background: #FFF0F0;
            border: 1px solid #E5B4B4;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
        }

        .error-summary p {
            margin-top: 0;
            font-weight: bold;
        }

        .error-summary ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        .form-footer {
            border-top: 1px solid #F0DCDC;
            margin-top: 25px;
            padding-top: 4px;
        }

        @media (max-width: 480px) {
            header {
                padding: 18px 20px;
            }

            header h2 {
                font-size: 21px;
            }

            .container {
                margin: 22px auto;
                padding: 0 14px;
            }

            .form-card {
                padding: 20px;
            }

            .form-card h1 {
                font-size: 23px;
            }

            .btn {
                display: block;
                width: 100%;
                text-align: center;
                margin-left: 0;
                margin-right: 0;
            }
        }
    </style>
</head>

<body>

<header>
    <h2>Student Services</h2>
</header>

<div class="container">
    <div class="form-card">

        <h1>Submit a Service Request</h1>

        <p class="subtitle">
            Request the assistance you need from the Student Services Office.
        </p>

        <div class="notice">
            Complete the form below with the details of the assistance you need.
            Please provide accurate information so your request can be processed.
        </div>

        @if ($errors->any())
            <div class="error error-summary">
                <p>Please correct the following errors:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('service-requests.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <label for="service_category_id">Service Category</label>

            <select
                id="service_category_id"
                name="service_category_id"
                required
            >
                <option value="">-- Select a category --</option>

                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('service_category_id') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('service_category_id')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="title">Request Title</label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
                maxlength="255"
                placeholder="Example: Request for Certificate of Enrollment"
                required
            >

            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
                maxlength="2000"
                placeholder="Explain your request and provide the necessary details."
                required
            >{{ old('description') }}</textarea>

            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror

            <!-- Supporting Document Upload -->
            <label for="attachment">
                Supporting Document (Optional)
            </label>

            <input
                type="file"
                id="attachment"
                name="attachment"
                accept=".pdf,.jpg,.jpeg,.png"
            >

            <p class="file-help">
                Accepted formats: PDF, JPG, JPEG, PNG.
                Maximum file size: 2 MB.
            </p>

            @error('attachment')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="form-footer">
                <button type="submit" class="btn submit-btn">
                    Submit Request
                </button>

                <a
                    href="{{ route('service-requests.index') }}"
                    class="btn back-btn"
                >
                    Cancel
                </a>
            </div>

        </form>

    </div>
</div>

</body>
</html>
