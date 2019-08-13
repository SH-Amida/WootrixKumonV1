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

#import <Foundation/Foundation.h>
#import "MSIDNetworkConfiguration.h"

@interface MSIDConfiguration : NSObject <NSCopying>

@property (readwrite) NSURL *authority;
@property (readwrite) NSString *redirectUri;
@property (readwrite) NSString *clientId;
@property (readwrite) NSString *target;

@property (readonly) NSString *resource;
@property (readonly) NSOrderedSet<NSString *> *scopes;

- (instancetype)initWithAuthority:(NSURL *)authority
                      redirectUri:(NSString *)redirectUri
                         clientId:(NSString *)clientId
                           target:(NSString *)target;

- (instancetype)initWithAuthority:(NSURL *)authority
                      redirectUri:(NSString *)redirectUri
                         clientId:(NSString *)clientId
                           target:(NSString *)target
                    correlationId:(NSUUID *)correlationId;

// Optional configurations
@property (readwrite) NSString *loginHint;
@property (readwrite) NSUUID *correlationId;

@property (readwrite) MSIDNetworkConfiguration *networkConfig;

@property (readwrite) NSDictionary<NSString *, NSString *> *sliceParameters;

@end