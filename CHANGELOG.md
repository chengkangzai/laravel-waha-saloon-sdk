# Changelog

All notable changes to `laravel-waha-saloon-sdk` will be documented in this file.

## v0.0.9: Enhanced QR endpoint with header-based response format support - 2025-07-10

### 🚀 Enhanced QR Endpoint Support

This release enhances the WAHA QR code endpoint with comprehensive header-based response format support, providing developers with flexible options for QR code retrieval.

#### ✨ New Features

- **Accept Header Support**: The `GetQrCodeForPairingWhatsAppApi` request class now supports Accept headers for content negotiation
- **Static Factory Methods**: New convenience methods for different response formats:
  - `forBinaryImage()` - Returns binary PNG image data
  - `forBase64Image()` - Returns JSON with base64-encoded image
  - `forRawValue()` - Returns JSON with raw QR code value
  
- **Auth Resource Convenience Methods**: Easy-to-use methods in the Auth resource:
  - `getQrCodeImage($session)` - Direct binary image access
  - `getQrCodeBase64($session)` - Base64 JSON response
  - `getQrCodeRaw($session)` - Raw QR code value
  

#### 🔧 Technical Details

The enhancement leverages WAHA's native support for three QR code response formats:

1. **Binary Image** (`Accept: image/png`) - Direct PNG binary data
2. **Base64 Image** (`Accept: application/json`) - JSON with base64-encoded image
3. **Raw Value** (`Accept: application/json` + `format=raw`) - JSON with raw QR string

#### 🔄 Backward Compatibility

All existing code continues to work unchanged. The original `getQrCodeForPairingWhatsAppApi()` method remains fully functional.

#### 📋 Usage Examples

```php
// Get binary image (new convenience method)
$response = $waha->auth()->getQrCodeImage('default');
file_put_contents('qr.png', $response->body());

// Get base64 JSON (new convenience method)  
$response = $waha->auth()->getQrCodeBase64('default');
$data = $response->json(); // ['data' => 'base64...', 'mimetype' => 'image/png']

// Get raw QR value (new convenience method)
$response = $waha->auth()->getQrCodeRaw('default');
$qrValue = $response->json()['value']; // '1@ABC123...'

// Using static factory methods directly
$response = $waha->send(GetQrCodeForPairingWhatsAppApi::forBinaryImage('default'));

```
#### 🧪 Testing

- Added comprehensive test coverage for all new functionality
- All existing tests continue to pass
- Code quality checks (PHPStan, Laravel Pint) passing

**Full Changelog**: https://github.com/chengkangzai/laravel-waha-saloon-sdk/compare/v0.0.8...v0.0.9

## v0.0.8 - 2025-07-03

**Full Changelog**: https://github.com/chengkangzai/laravel-waha-saloon-sdk/compare/v0.0.7...v0.0.8

## v0.0.7 - 2025-07-02

**Full Changelog**: https://github.com/chengkangzai/laravel-waha-saloon-sdk/compare/v0.0.6...v0.0.7

## v0.0.5 - 2025-07-02

**Full Changelog**: https://github.com/chengkangzai/laravel-waha-saloon-sdk/compare/v0.0.4...v0.0.5

**Full Changelog**: https://github.com/chengkangzai/laravel-waha-saloon-sdk/compare/v0.0.4...v0.0.5

## v0.0.4 - 2025-07-02

### What's Changed

- Minor fixes and improvements

**Full Changelog**: https://github.com/chengkangzai/laravel-waha-saloon-sdk/compare/v0.0.3...v0.0.4

## v0.0.3 - 2025-07-02

### What's Changed

* Bump stefanzweifel/git-auto-commit-action from 5 to 6 by @dependabot in https://github.com/chengkangzai/laravel-waha-saloon-sdk/pull/1

### New Contributors

* @dependabot made their first contribution in https://github.com/chengkangzai/laravel-waha-saloon-sdk/pull/1

**Full Changelog**: https://github.com/chengkangzai/laravel-waha-saloon-sdk/compare/v0.0.2...v0.0.3
