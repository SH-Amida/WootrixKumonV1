// Copyright (c) Microsoft Corporation.
// All rights reserved.
//
// This code is licensed under the MIT License.
//
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files(the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and / or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions :
//
// The above copyright notice and this permission notice shall be included in
// all copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
// THE SOFTWARE.

extern NSString *MSIDErrorDescriptionKey;
extern NSString *MSIDOAuthErrorKey;
extern NSString *MSIDOAuthSubErrorKey;
extern NSString *MSIDCorrelationIdKey;
extern NSString *MSIDHTTPHeadersKey;
extern NSString *MSIDHTTPResponseCodeKey;

/*!
 ADAL and MSID use different error domains and error codes.
 When extracting shared code to common core, we unify those error domains
 and error codes to be MSID error domains/codes and list them below. Besides,
 domain mapping and error code mapping should be added to ADAuthenticationErrorConverter
 and MSIDErrorConveter in corresponding project.
 */
extern NSString *MSIDErrorDomain;
extern NSString *MSIDOAuthErrorDomain;
extern NSString *MSIDKeychainErrorDomain;

typedef NS_ENUM(NSInteger, MSIDErrorCode)
{
    MSIDErrorInternal = -51000,
    MSIDErrorInvalidInternalParameter = -51001,
    
    MSIDErrorInvalidDeveloperParameter = -51002,
    MSIDErrorAmbiguousAuthority     = -51003,
    MSIDErrorInteractionRequired    = -51004,
    
    MSIDErrorCacheMultipleUsers     = -51005,
    
    /*!
     MSID encounted an error when trying to store or retrieve items from
     keychain. Inspect NSUnderlyingError from the userInfo dictionary for
     more information about the specific error. Keychain error codes are
     documented in Apple's <Security/SecBase.h> header file
     */
    MSIDErrorTokenCacheItemFailure  = -51006,
    MSIDErrorWrapperCacheFailure    = -51007,
    MSIDErrorCacheBadFormat         = -51008,
    MSIDErrorCacheVersionMismatch   = -51009,
    
    MSIDErrorServerInvalidResponse = -51010,
    MSIDErrorDeveloperAuthorityValidation = -51011,
    MSIDErrorServerRefreshTokenRejected = -51012,
    MSIDErrorServerOauth = -51013,
    MSIDErrorInvalidRequest = -51014,
    MSIDErrorInvalidClient = -51015,
    MSIDErrorInvalidGrant = -51016,
    MSIDErrorInvalidParameter = -51017,
    MSIDErrorUnsupportedFunctionality = -51018,
    MSIDErrorCodeFirst = MSIDErrorInternal,
    MSIDErrorCodeLast = MSIDErrorUnsupportedFunctionality
};

extern NSError *MSIDCreateError(NSString *domain, NSInteger code, NSString *errorDescription, NSString *oauthError, NSString *subError, NSError *underlyingError, NSUUID *correlationId, NSDictionary *additionalUserInfo);

